<?php
if (!function_exists('CheckAdminLoginMiddleware')) {
    function CheckAdminLoginMiddleware(): bool
    {
        return session()->get('role') === 0;
    }
}
