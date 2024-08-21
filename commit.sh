#!/bin/bash
# Upload files to Github - git@github.com:talesCPV/ andre_tenis
.git

read -p "Are you sure to commit  andre_tenis 1.0 to GitHub ? (Y/n)" -n 1 -r
echo    # (optional) move to a new line
if [[ $REPLY =~ ^[Yy]$ ]]
then

    cp ~/Documentos/SQL/andre/*.sql sql/

    git init

    git add assets/
    git add backend/
    git add config/
    git add scripts/
    git add sql/
    git add style/
    git add templates/
    git add index.html
    git add commit.sh
    
    git commit -m "by_script"

    git branch -M main
    git remote add origin git@github.com:talesCPV/ andre_tenis.git
    git remote set-url origin git@github.com:talesCPV/ andre_tenis.git

    git push -u -f origin main

fi