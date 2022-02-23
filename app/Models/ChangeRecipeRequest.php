<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ChangeRecipeRequest extends Model
{
    use HasFactory;

    private Request $request;

    public function __construct(Request $request, array $attributes = [])
    {
        parent::__construct($attributes);
        $this->request = $request;
    }

    public function changeRequest(): array
    {
        $data['recipe'] = $this->request->all();
        $data['recipe']['thumbnail'] = $this->uploadImage($data['recipe']['thumbnail']);

        $data['steps'] = $this->steps($data['recipe']['steps']);
        $data['ingredients'] = $data['recipe']['ing'];
        unset($data['recipe']['steps']);
        unset($data['recipe']['ing']);

        return $data;

    }

    private function steps(array $steps): array
    {
        $newArray = [];
        $i = 0;
        foreach ($steps as $step){
            $newArray[$i]['step'] = $step['step'];
            $newArray[$i]['info'] = $step['description'];
            if (!is_null($step['image'])){
                $newArray[$i]['image'] = $this->uploadImage($step['image']);
            }
            $i++;
        }

        return $newArray;
    }

    private function uploadImage(UploadedFile $file): string
    {
        $folder = date('Y-m-d');
        return $file->store("images/{$folder}");
    }
}
