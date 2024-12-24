#!/bin/bash

# bash c.sh abc 375 b

if [ "$#" -ne 3 ]; then
    echo "Error: input 3 parameters"
    exit 1
fi

# currently, I only aim to abc, so I hardcoded.
contest_name="$1$2"
file_name="$3"

# TODO: verify whether the directory exists or not
mkdir -p ./"${contest_name}"
cp ./template.php ./"${contest_name}"/"${file_name}".php