<?php

namespace Xefi\Faker\EnUs\Extensions;

use Xefi\Faker\Extensions\ColorsExtension as BaseColorsExtension;

class ColorsExtension extends BaseColorsExtension
{
    public function getLocale(): string|null
    {
        return 'en_US';
    }

    protected array $safeColorNames = [
        'Black', 'Brown', 'Green', 'Navy', 'Olive',
        'Purple', 'Teal', 'Lime', 'Blue', 'Silver',
        'Gray', 'Yellow', 'Fuchsia', 'Aqua', 'White',
    ];

    protected array $colorNames = [
        'AliceBlue', 'AntiqueWhite', 'Aqua', 'Aquamarine', 'Azure',
        'Beige', 'Bisque', 'Black', 'BlanchedAlmond', 'Blue',
        'BlueViolet', 'Brown', 'BurlyWood', 'CadetBlue', 'Chartreuse',
        'Chocolate', 'Coral', 'CornflowerBlue', 'Cornsilk', 'Crimson',
        'Cyan', 'DarkBlue', 'DarkCyan', 'DarkGoldenRod', 'DarkGray',
        'DarkGreen', 'DarkKhaki', 'DarkMagenta', 'DarkOliveGreen', 'DarkOrange',
        'DarkOrchid', 'DarkRed', 'DarkSalmon', 'DarkSeaGreen', 'DarkSlateBlue',
        'DarkSlateGray', 'DarkTurquoise', 'DarkViolet', 'DeepPink', 'DeepSkyBlue',
        'DimGray', 'DodgerBlue', 'FireBrick', 'FloralWhite', 'ForestGreen',
        'Fuchsia', 'Gainsboro', 'GhostWhite', 'Gold', 'Gray',
        'Green', 'GreenYellow', 'Honeydew', 'HotPink', 'IndianRed',
        'Indigo', 'Ivory', 'Khaki', 'Lavender', 'LavenderBlush',
        'LawnGreen', 'LemonChiffon', 'LightBlue', 'LightCoral', 'LightCyan',
        'LightGoldenRodYellow', 'LightGray', 'LightGreen', 'LightPink', 'LightSalmon',
        'LightSeaGreen', 'LightSkyBlue', 'LightSlateGray', 'LightSteelBlue', 'LightYellow',
        'Lime', 'LimeGreen', 'Linen', 'Magenta', 'Maroon',
        'MediumAquamarine', 'MediumBlue', 'MediumOrchid', 'MediumPurple', 'MediumSeaGreen',
        'MediumSlateBlue', 'MediumSpringGreen', 'MediumTurquoise', 'MediumVioletRed', 'MidnightBlue',
        'MintCream', 'MistyRose', 'Moccasin', 'NavajoWhite', 'Navy',
        'OldLace', 'Olive', 'OliveDrab', 'Orange', 'OrangeRed',
        'Orchid', 'PaleGreen', 'PaleTurquoise', 'PaleVioletRed', 'PapayaWhip',
        'PeachPuff', 'Peru', 'Pink', 'Plum', 'PowderBlue',
        'Purple', 'Red', 'RosyBrown', 'RoyalBlue', 'SaddleBrown',
        'Salmon', 'SandyBrown', 'SeaGreen', 'SeaShell', 'Sienna',
        'Silver', 'SkyBlue', 'SlateBlue', 'SlateGray', 'Snow',
        'SpringGreen', 'SteelBlue', 'Tan', 'Teal',
        'Thistle', 'Tomato', 'Turquoise', 'Violet', 'Wheat',
        'White', 'WhiteSmoke', 'Yellow',
    ];
}
