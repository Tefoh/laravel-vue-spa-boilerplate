<?php

Route::fallback(function () {
    return view('home');
});
