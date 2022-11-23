# Things to do after the installation

- Create a cron job to delete the expired tokens every 15 minutes and runs `php path_to_this_project_folder/artisan tokens:delete >> /dev/null 2>&1`
