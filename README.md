# Grid for GridElements

Version 2.X.X

[![TYPO3](https://img.shields.io/badge/TYPO3-10.4%20LTS-green)](https://typo3.org/)
[![GridElements](https://img.shields.io/badge/Grid%20Elements-10-green)](https://extensions.typo3.org/extension/gridelements/)

Version 1.X.X

[![TYPO3](https://img.shields.io/badge/TYPO3-9.5%20LTS-green)](https://typo3.org/)
[![GridElements](https://img.shields.io/badge/Grid%20Elements-9-green)](https://extensions.typo3.org/extension/gridelements/)

## Description

You can use this extension for adding an easy to use Grid which are Framework independently.

It's pre configured for Bootstrap 4. 

***Important: The Bootstrap CSS/JS is not included***

## Features

There are Grid options to choose for an TYPO3 editor. Something like 
* 50/50 
* 33/66 
* 25/75

This work for 
* 2 column grid
* 3 column grid
* 4 column grid

### Backend

#### Configuration

![Screenshot Backend Configuration ](https://abload.de/img/bildschirmfoto2019-04vdkuq.png)

#### Backend View

![Screenshot Backend](https://abload.de/img/bildschirmfoto2019-046fks1.png)

### Frontend
![Screenshot Frontend Output](https://abload.de/img/bildschirmfoto2019-04v2jtg.png)

## Install

1) Install the extension gridelements.
2) Install the extension grid_for_gridelements
3) Include the static template
4) Be happy with an easy way to use Grids in TYPO3 :)

### Composer install:
```bash
composer require schmidtwebmedia/grid-for-gridelements
```

## Customizing

You can customize the output in frontend and change the framework or add more options for Grid ratio.
And change the path to JSON Config file in extension settings.

Please use following structure of json file: 


```json
{
  "cols": [
    {
      "twocol": [
        {
          "label": "auto",
          "class": [
            "col-12 col-md",
            "col-12 col-md"
          ]
        },
        ...
      ],
      "threecol": [
        {
          "label": "auto",
          "class": [
            "col-12 col-md",
            "col-12 col-md",
            "col-12 col-md"
          ]
        },
       ...
      ],
      "fourthcol": [
        {
          "label": "auto",
          "class": [
            "col-12 col-sm-6 col-md",
            "col-12 col-sm-6 col-md",
            "col-12 col-sm-6 col-md",
            "col-12 col-sm-6 col-md"
          ]
        },
        ...
      ]
    }
  ],
  "row": [
    {
      "class": "row"
    }
  ]
}
```
