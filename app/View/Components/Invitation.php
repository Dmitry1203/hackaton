<?php
namespace App\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
class Invitation  extends Component
{
    public $invitationAuthor;
    public $invitationAuthorAvatar;
    public $invitationEmail;
    public $invitationStatus;
    public $invitationUserId;
    public $invitationCreated;
    public $invitedUser;


    public function __construct(
        $invitationAuthor,
        $invitationAuthorAvatar,
        $invitationEmail,
        $invitationStatus,
        $invitationUserId,
        $invitationCreated
    )
    {

        $this->invitationAuthor = $invitationAuthor;
        $this->invitationEmail = $invitationEmail;
        $this->invitationStatus = $invitationStatus;
        $this->invitationAuthorAvatar = $invitationAuthorAvatar;
        $this->invitationUserId = $invitationUserId;
        $this->invitationCreated = $invitationCreated;

        if (!empty($invitationUserId)) {
            $this->invitedUser = DB::table('users')->find($invitationUserId);
        } else {
            $this->invitedUser = null;
        }

    }

    public function render()
    {
        return view('components.invitation');
    }
}
