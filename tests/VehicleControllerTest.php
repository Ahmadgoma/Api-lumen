<?php

class VehicleControllerTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_it_return_expenses_array_json_response()
    {
        $this->json('get', '/api/v1/vehicle-expenses')
            ->seeStatusCode(200)
            ->seeJsonStructure(
                ['expenses' => [],
                ]
            );
    }

}
