<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\BookingModel;
use App\Models\RoomsModel;
use App\Models\PositionModel;
use App\Models\NotificationModel;

class Main extends Base
{
  function UserModel()
  {
    return new UsersModel();
  }

  function BookingModel()
  {
    return new BookingModel();
  }

  function RoomsModel()
  {
    return new RoomsModel();
  }

  function PositionModel()
  {
    return new PositionModel();
  }

  function NotificationModel()
  {
    return new NotificationModel();
  }
}
