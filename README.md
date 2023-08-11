# ePortfolio - WordPress Theme
This custom WP theme is based on WP Rig starter theme. See the following resources to get familiar with WP Rig:
- [Official WP Rig website](https://wprig.io/)
- [Documentation and how-to videos](https://wprig.io/course/wprig_en_v2/)
- [WP Rig github repo](https://github.com/wprig/wprig)

## Local installation
1. Clone this repository to the `themes` folder of your WordPress site on your local development environment (`eportfolio-wordpress\wordpress\wp-content\themes`):
```
git clone git@gitlab.oit.duke.edu:code-plus-eportfolio/eportfolio-theme-dev.git
```	

2. From the cloned folder, install composer and npm dependencies (ignore the deprecation warnings):
```
cd eportfolio-theme-dev
composer install
npm install
```


3. Run initial build:
```
npm run build
```

4. Make sure your local WordPress site is running (`ddev describe`). If it is not running, start it: `ddev start`.

Log in to wp-admin, and activate the new theme WP Rig.

5. To launch the active browersync session, run `npm run dev`. The front-end site with the theme activated should launch at http://localhost:8181/.

## Useful scripts:
- `npm update` - update npm packages
- `npm run dev` - process source files, build the development theme, and watch files for subsequent changes
- `npm run build` - process the source files and build the development theme without watching files afterwards
- `npm run bundle` - create the production build of the theme

## Using Issues Workflow in Gitlab
1. Start in the `develop` branch on GitLab. If your `develop` is not up to date, `git pull` will update your local repository.

2. Scroll through the icons on the left side bar and select **Issues**

3. Click on **New Issue** then give a decriptive title, assign the issue to yourself, and press **Create Issue**

4. To begin working in the new branch select **Create Merge Request** then **Check Out Branch**. Copy the command lines from Step One and paste into Terminal:
```
git fetch origin
git checkout -b "branch-name" "origin/branch-name"
```

5. You are now working in your new branch. Make any needed changes to the code and save them. Then commit and push these changes back to GitLab. You can make as many commits in your branch as you'd like.
- `git add .` - stage all changes in the working directory for commit
- `git commit -m "message"` - commits changes 
- `git push` - transfers commits from local repository to GitLab

6. To merge the changes in your branch back to `develop`, click on **Mark as Ready** in GitLab. Ensure **Delete Source Branch** is checked and then select **Merge**.

7. To switch back into the `develop` branch, type `git checkout develop` in Terminal.

8. If at any point, you are unsure which branch you are working on, `git status` will tell you which branch, if it is up to date, and any changes made. `git checkout branch-name` will enable you to switch to any other branch, and `git log` will show a history of all commits. 

