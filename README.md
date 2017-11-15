# E4K WordPress Framework

This repository contains the E4K Website Framework for cutting down time on projects when developing a WordPress Website. This repository is maintained by the Developers at [E4K Digital Agency](http://www.e4k.co).

- [Download the latest release.](https://bitbucket.org/e4kdevteam/e4k-framework/downloads/)
- Clone the repo: `git clone https://coderste@bitbucket.org/e4kdevteam/e4k-framework.git`

## Versioning

As a Team we try our best to follow the [the Semantic Versioning guidelines](http://semver.org/). We will try to adhere to those rules whenever possible.

## Issues

If you have found an error within the theme or a missing file then you can create an [issue](https://bitbucket.org/e4kdevteam/e4k-framework/issues) and one of the developers will work on a fix.

### Extra

This framework comes pre-installed with [Advanced Custom Fields (ACF)](https://www.advancedcustomfields.com/), however it does not Update Automatically. If Advanced Custom Fields releases an Update then you will have to update the Plugin Manually within the Theme.

To do this you will have to do the follow.

1. Download the Latest Advanced Custom Fields Version.
2. Copy the ACF folder into the framework folder as ACF-New.
3. Rename the current ACF Folder to ACF-Old.
4. Update the name on ACF-New to ACF (lowercase).

Please do not do this on a live site - as Advanced Custom Fields may have updated some of it's functionality which could cause the site to break. Always test out the Updates on a Dummy Test site.