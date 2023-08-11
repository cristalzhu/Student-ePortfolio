# ePortfolio - WordPress Theme
This custom WP theme is based on WP Rig starter theme:
- [Official WP Rig website](https://wprig.io/)
- [Documentation and how-to videos](https://wprig.io/course/wprig_en_v2/)
- [WP Rig github repo](https://github.com/wprig/wprig)

## Local installation
```
composer install
npm install
npm run build
```

1. Make sure your local WordPress site is running (`ddev describe`). If it is not running, start it: `ddev start`.

Log in to wp-admin, and activate the new theme WP Rig.

2. To launch the active browersync session, run `npm run dev`. The front-end site with the theme activated should launch at http://localhost:8181/.

## Useful scripts:
- `npm update` - update npm packages
- `npm run dev` - process source files, build the development theme, and watch files for subsequent changes
- `npm run build` - process the source files and build the development theme without watching files afterwards
- `npm run bundle` - create the production build of the theme
