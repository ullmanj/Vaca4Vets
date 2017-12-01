#!/bin/bash
  git clone https://github.com/ullmanj/Vaca4Vets
  shopt -s extglob
  rm !(automatePush.php|autoPull.sh)
  mv Vaca4Vets/*