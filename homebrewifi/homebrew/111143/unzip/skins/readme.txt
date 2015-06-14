Here you will find the template skin you can use for changing the ZXDS look and feel.
To use it, modify the *.bmp files and style.cfg and then put it to /ZXDS/Graphics/ directory.

The self explaining names of supported backgrounds are as follows:

bg_background.bmp
bg_requester.bmp
bg_slots.bmp
bg_controls.bmp
bg_keyboard1.bmp
bg_keyboard2.bmp
bg_pressed1.bmp
bg_pressed2.bmp

If some of them is not present, the builtin one is used instead.

The palette is currently shared by all backgrounds and is currently taken
from the bg_pressed1 background (builtin or not). This may or may not change
in the future, but it is advisable that all backgrounds share the palette anyway.

In backgrounds, avoid using colors 0x[0-F]0 and 0x0[0-F]. These colors are
reserved for future use by ZXDS.

The self explaining names of icons are:

icons.bmp
controls.bmp

If some of them is not present, the builtin one is used instead.

The palette is shared by all icons and is taken from icons (builtin or not).

To modify the color of other UI elements, adjust it in style.cfg. 
See builtin/style.cfg for list of supported colors and their default values.
Values not present are left at their default (or previous) values.

Also note that it is possible to switch these colors at run time by simply
loading the style configs in the load file requester. It may be useful when
experimenting with multiple designs.
