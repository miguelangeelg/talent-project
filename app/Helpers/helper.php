<?php

if (!function_exists('generate_uuid')) {
    function generate_uuid()
    {
        return Ramsey\Uuid\Uuid::uuid4()->toString();
    }
}
