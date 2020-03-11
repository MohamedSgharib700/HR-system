<?php

namespace App\Http\Services;

use App\Models\Transaction;
use App\Repositories\UserRepository;
use File;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class ImportFromTextFile implements ImportUserTransactionInterface
{

    private $userRepository;


    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function process(Request $request)
    {
        if ($request->hasFile('attendance_file')) {
            $filePath = $this->uploadFile($request->file('attendance_file'), 'text_file', 'TAT');
        }
        try {
            return $this->ProcessDataFromFile($filePath);
        } catch (\Exception $e) {
            return back()->with('danger', trans('something_went_wrong_check_file'));
        }

    }

    /**
     * @param UploadedFile $file
     * @param $folder
     * @param null $fileName
     * @return string
     */
    public function uploadFile(UploadedFile $file, $folder, $fileName = null)
    {

        $path = public_path() . '/assets/uploads/import_transactions/' . $folder . '/';

        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true);
        }

        $file_name = $fileName . '.' . $file->getClientOriginalExtension();

        if ($file->move($path, $file_name)) {
            return $file = $path . $file_name;
        }
    }

    /**
     * @param $attendance_file
     */
    public function ProcessDataFromFile($attendance_file)
    {
        foreach (file($attendance_file) as $line) {
            $lineArray = array();
            if (trim($line) != "") {
                $lineArray = explode(",", trim($line));
                if (!empty($lineArray)) {
                    $machineCode = trim($lineArray[0]);
                    $trans_date = trim($lineArray[1]);
                    $trans_type = trim($lineArray[2]);

                    $trans_date = date('Y-m-d H:i:s', strtotime(' -5 minutes', strtotime($trans_date)));


                    if ($machineCode && $trans_date) {
                        request()->query->set('machine_code', $machineCode);
                        if ($this->userRepository->search(request())->first()) {

                            Transaction::firstOrCreate([
                                'machine_code' => $machineCode,
                                'trans_date' => $trans_date,
                                'type' => $trans_type,
                            ]);

                        } // End IF
                    }
                }

            }

        } //End ForEach
    } //End Function
}
