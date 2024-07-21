<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use League\Csv\Reader;

class DashboardController extends Controller
{
    public function exportUsers(Request $request)
    {
        $users = User::all();

        # Define the CSV headers
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="users.csv"',
        ];

        # Create a StreamedResponse to stream the CSV file
        $response = new StreamedResponse(function () use ($users) {
            $handle = fopen('php://output', 'w');

            # Add CSV column headers
            fputcsv($handle, ['ID', 'Name', 'Email', 'Username', 'Mobile Number']);

            # Add each user to the CSV file
            foreach ($users as $user) {
                fputcsv($handle, [
                    $user->id,
                    $user->name,
                    $user->email,
                    $user->username,
                    $user->mobile_number,
                ]);
            }

            fclose($handle);
        }, 200, $headers);

        return $response;
    }

    public function importUsers(Request $request)
    {
        # Handle the file upload
        $file = $request->file('csv_file');

        # Read and parse the CSV file
        $csv = Reader::createFromPath($file->getRealPath(), 'r');
        $csv->setHeaderOffset(0); # Set the CSV header offset

        # Loop through the CSV records
        foreach ($csv as $record) {
            User::updateOrCreate(
                ['email' => $record['email']],
                [
                    'name' => $record['name'],
                    'username' => $record['username'],
                    'mobile_number' => $record['mobile_number'],
                    'password' => bcrypt('123'), # or handle password
                ]
            );
        }

        return redirect()->route('dashboard')->with('success', 'Users imported successfully.');
    }
}
