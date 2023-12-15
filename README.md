# Nolej AI for ILIAS LMS Page Component
This is the companion plugin for [Nolej AI for ILIAS LMS](https://github.com/oc-group/Nolej-AI-for-ILIAS-LMS).

Generate the activities with the main plugin, and insert them in your modules with this plugin.

## Requirements

* [Nolej AI for ILIAS LMS plugin](https://github.com/oc-group/Nolej-AI-for-ILIAS-LMS) installed and updated.

## Installation

### Download the plugin

From the ILIAS directory, run:

```sh
mkdir -p Customizing/global/plugins/Services/COPage/PageComponent
cd Customizing/global/plugins/Services/COPage/PageComponent
git clone https://github.com/oc-group/Nolej-AI-for-ILIAS-LMS-Page-Component.git NolejPageComponent
```

### Install the plugin

1. Go into `Administration` -> `Extending ILIAS` -> `Plugins`
2. Look for the plugin "NolejPageComponent"
3. Click on `Actions` -> `Install`

### After installation

1. From the ILIAS directory, run:

```sh
composer install --no-dev
```
