#!/bin/bash
find . -mindepth 1 -type d -not -path "./.git/*" -exec cp ./index.html {} \;
