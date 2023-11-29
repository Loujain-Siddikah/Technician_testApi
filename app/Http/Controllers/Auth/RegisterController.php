<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Models\SecondaryService;
use App\Traits\ImageTrait;
use App\Traits\JsonResponseTrait;
use Illuminate\Validation\ValidationException;


class RegisterController extends Controller
{
    use ImageTrait;
    use JsonResponseTrait;
    public function create_user(StoreUserRequest $request){
        try{
        $userPicture_name = $this->saveImage($request->picture,'images/userPictures/');
        $residencePicture_name = $this->saveImage($request->residence_picture,'images/residencePicture/');
        $user = User::create([
            'name' => $request->name,
            'picture' => '/images/userPictures/'.$userPicture_name,
            'phone' => $request->phone,
            'city' => $request->city,
            'bank_name' => $request->bank_name,
            'iban' => $request->iban,
            'location_latitude' => $request->location_latitude,
            'location_longitude' => $request->location_longitude,
            'residence_picture' => '/images/residencePicture/'.$residencePicture_name,
        ]);

        //Attach secodary services
        // secondaryServices() defined in user model that represent many to many relation
        $secondaryServicesArray = $request->input('secondary_services');

        foreach ($secondaryServicesArray as $secondaryServiceId) {
            $sec= SecondaryService::find($secondaryServiceId);
            if($sec){
                $user->secondaryServices()->attach($secondaryServiceId);
            }else{
                return $this->jsonErrorResponse('Error',500);
            }

        }
     
        $token=$user->createToken('authToken' . $user->name)->plainTextToken;
        //msg, array data,status
        return $this->jsonSuccessResponse('Registytration successful',['token' => $token], 201);
        }catch(ValidationException $e){
            //msg, status
            return $this->jsonErrorResponse('Validation error',402,['errors' => $e->errors()]);
        }
        // catch(\Exception $e){
        //     return $this->jsonErrorResponse('Error occurred',500);
        // }
        

    }
}
