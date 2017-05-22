<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Contact
 *
 */
	class Contact extends \Eloquent {}
}

namespace App{
/**
 * App\DetailReservasi
 *
 */
	class DetailReservasi extends \Eloquent {}
}

namespace App{
/**
 * App\Fasilitas
 *
 */
	class Fasilitas extends \Eloquent {}
}

namespace App{
/**
 * App\FasilitasRuangan
 *
 */
	class FasilitasRuangan extends \Eloquent {}
}

namespace App{
/**
 * App\Layanan
 *
 */
	class Layanan extends \Eloquent {}
}

namespace App{
/**
 * App\Pengumuman
 *
 */
	class Pengumuman extends \Eloquent {}
}

namespace App{
/**
 * App\Reservasi
 *
 */
	class Reservasi extends \Eloquent {}
}

namespace App{
/**
 * App\Room
 *
 */
	class Room extends \Eloquent {}
}

namespace App{
/**
 * App\RoomCategory
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Fasilitas[] $fasilitas
 */
	class RoomCategory extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 */
	class User extends \Eloquent {}
}

