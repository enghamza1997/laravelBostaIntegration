<?php
use Illuminate\Database\Migrations\Migration;

class CreateUpdateStateCodeTrigger extends Migration {

    public function up()
    {
        DB::unprepared(
            'CREATE TRIGGER `update_state_code` AFTER INSERT ON `package_tracks`
            FOR EACH ROW BEGIN
            UPDATE order_packages SET order_packages.last_state = NEW.state_code
            WHERE order_packages.id = NEW.order_package_id;
            END');
    }


    public function down()
    {
        DB::unprepared('DROP TRIGGER Update_state_code');
    }
}