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
 * App\Client
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Project[] $projects
 */
	class Client extends \Eloquent {}
}

namespace App{
/**
 * App\File
 *
 * @property-read \App\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FileVersion[] $versions
 */
	class File extends \Eloquent {}
}

namespace App{
/**
 * App\FileVersion
 *
 */
	class FileVersion extends \Eloquent {}
}

namespace App{
/**
 * App\Project
 *
 * @property-read \App\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\File[] $files
 * @property-read \App\Team $team
 */
	class Project extends \Eloquent {}
}

namespace App{
/**
 * App\Team
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Client[] $clients
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Project[] $projects
 */
	class Team extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Team[] $teams
 */
	class User extends \Eloquent {}
}

