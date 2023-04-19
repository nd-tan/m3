<?php

namespace App\Imports;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnError
{
    public function model(array $row)
    {
        try {
            $line_manager = User::where("name", "like", "%".$row['user_id']."%")->first();
            $row['user_id'] = $line_manager->id;
            return new Message([
                'room_name'     => $row['room_name'],
                'content'    => $row['content'],
               'user_id'    => $row['user_id'],
            ]);
        } catch (\Exception $e) {
            Log::error('message:'. $e->getMessage());
            return null;
        }
    }
    public function headingRow(): int
    {
        return 1;
    }
    public function rules(): array{
        return [
            '*.room_name' => ['required', 'max:20'],
        ];
    }
    public function customValidationMessages() {
        return [
            '*.room_name.required' => 'Tên phòng không được rỗng',
        ];
    }

	/**
	 * @param \Throwable $e
	 * @return mixed
	 */
	public function onError(\Throwable $e) {
	}
}
