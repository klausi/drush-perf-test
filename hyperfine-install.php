<?php

if (file_exists('hyperfine')) {
  return;
}

$architecture = trim(shell_exec('dpkg --print-architecture'));
$file_name = "hyperfine_1.16.1_$architecture.deb ";
$download_destination = "/tmp/$file_name";
system("wget -O $download_destination https://github.com/sharkdp/hyperfine/releases/download/v1.16.1/hyperfine_1.16.1_$architecture.deb");
system("sudo dpkg -i $download_destination");
# Move hyperfine binary to project directory, then it does not get lost on
# ddev restart.
system("mv /usr/bin/hyperfine .");
