<?php
class Config
{
    private $app_title;
    private $app_title_abbr;
    private $app_description;


    public function __construct(string $location)
    {
        $json_config = file_get_contents("{$location}/config/app.json");
        if ($json_config === false) {
            return false;
        }

        if ($json_config === null) {
            return false;
        }

        $config = json_decode($json_config, true);

        $this -> app_title = $config['app-title'];
        $this -> app_title_abbr = $config['app-title-abbr'];
        $this -> app_description = $config['app-description'];
    }

    public function GetAppTitle()
    {
        return $this -> app_title;
    }

    public function GetAppTitleAbbr()
    {
        return $this -> app_title_abbr;
    }

    public function GetAppDescription()
    {
        return $this -> app_description;
    }
}
