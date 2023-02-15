<?php
function set_notifikasi_swal($icon, $title, $text)
{
    session()->setFlashdata('swal_text', $text);
    session()->setFlashdata('swal_icon', $icon);
    session()->setFlashdata('swal_title', $title);
}


function set_notifikasi_toast($icon, $title)
{
    session()->setFlashdata('toast_icon', $icon);
    session()->setFlashdata('toast_title', $title);
}
