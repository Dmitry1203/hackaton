<?php
namespace App\View\Components;
use Illuminate\View\Component;
class Application  extends Component
{

    public $applicationId;
    public $applicationUserName;
    public $applicationUserSurname;
    public $applicationUserJobSearch;
    public $applicationUserEducation;
    public $applicationUserExperience;
    public $applicationUserAbout;
    public $applicationUserAvatar;
    public $applicationMessage;
    public $applicationDate;


    public function __construct
    (
     $applicationId,
     $applicationUserName,
     $applicationUserSurname,
     $applicationUserJobSearch,
     $applicationUserEducation,
     $applicationUserExperience,
     $applicationUserAbout,
     $applicationUserAvatar,
     $applicationMessage,
     $applicationDate
    )

    {

        $this->applicationId = $applicationId;
        $this->applicationUserName = $applicationUserName;
        $this->applicationUserSurname = $applicationUserSurname;
        $this->applicationUserJobSearch = $applicationUserJobSearch;
        $this->applicationUserEducation = $applicationUserEducation;
        $this->applicationUserExperience = $applicationUserExperience;
        $this->applicationUserAbout = $applicationUserAbout;
        $this->applicationUserAvatar = $applicationUserAvatar;
        $this->applicationMessage = $applicationMessage;
        $this->applicationDate = $applicationDate;

    }

    public function render()
    {
        return view('components.application');
    }
}
