<?php


namespace App\Traits;


use App\User;
use Illuminate\Support\Facades\Auth;

trait Friends
{
    public function friends()
    {
        return $this->belongsToMany(\App\User::class, 'friends_users', 'user_id', 'friend_id')->where('status', '=', 'accepted')->withTimestamps();
    }

    public function pendingFriendRequests()
    {
        return $this->belongsToMany(\App\User::class, 'friends_users', 'user_id', 'friend_id')->where('status', '=', 'pending')->withTimestamps();
    }

    public function declinedFriendRequests()
    {
        return $this->belongsToMany(\App\User::class, 'friends_users', 'user_id', 'friend_id')->where('status', '=', 'declined')->withTimestamps();
    }

    public function friendShipAble()
    {
        return $this->belongsToMany(\App\User::class, 'friends_users', 'user_id', 'friend_id')->whereNotIn('user_id', [Auth::id()])->withTimestamps();
    }

//    public function scopeFriendShipAble($query)
//    {
//        return $query->whereNotIn('user_id', Auth::user()->friends);
//    }

    public function sendFriendRequest(User $user)
    {
        $this->friends()->attach($user->id, ['status' => 'pending']);
    }

    public function acceptFriendRequest(User $user)
    {
        $this->friends()->updateExistingPivot($user->id, ['status' => 'accepted']);
    }

    public function declineFriendRequest(User $user)
    {
        $this->friends()->updateExistingPivot($user->id, ['status' => 'declined']);
    }

    public function removeFriend(User $user)
    {
        $this->friends()->detach($user->id);
    }
}
