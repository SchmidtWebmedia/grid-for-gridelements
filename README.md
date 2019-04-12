# Grid for GridElements

## Description

You can use this extension for adding an easy to use Grid which are Framework independently.

It's pre configured for Bootstrap 4.

## Features

There are Grid options to choose for an TYPO3 editor. Something like 
* 50/50 
* 33/66 
* 25/75

This work for 
* 2 column grid
* 3 column grid
* 4 column grid


## Install

1) Install the extension gridelements.
2) Install the extension grid_for_gridelements
3) Include the static template
4) Be happy with an easy way to use Grids in TYPO3 :)

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


