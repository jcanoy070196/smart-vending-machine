<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student1 = new Student();
        $student1->idNumber = "1321567";
        $student1->rfid = "AABBCCDDED";
        $student1->firstName = "Nadiene";
        $student1->middleName = "";
        $student1->lastName = "Narvaiz";
        $student1->balance = 0;
        $student1->save();

        $student2 = new Student();
        $student2->idNumber = "1420051";
        $student2->rfid = "AABBCCDDEE";
        $student2->firstName = "Micole Angelie";
        $student2->middleName = "";
        $student2->lastName = "Valdevia";
        $student2->balance = 0;
        $student2->save();

        $student3 = new Student();
        $student3->idNumber = "1620149";
        $student3->rfid = "AABBCCDDEF";
        $student3->firstName = "Eva Monica";
        $student3->middleName = "";
        $student3->lastName = "Mijares";
        $student3->balance = 0;
        $student3->save();


        $student4 = new Student();
        $student4->idNumber = "1620156";
        $student4->rfid = "AABBCCDDEG";
        $student4->firstName = "Jezmaximino";
        $student4->middleName = "";
        $student4->lastName = "Besas";
        $student4->balance = 0;
        $student4->save();
    }
}
