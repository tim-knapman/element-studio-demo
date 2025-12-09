<?php

namespace BreakdanceCustomElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;

\Breakdance\Elements\PresetSections\PresetSectionsController::getInstance()->register(
    "BreakdanceCustomElements\\Year-Data",
    c(
        "year",
        "Year",
        [c(
        "new_control",
        "New Control",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => [['value' => 'value', 'text' => 'test4tegerLabele er']]],
        false,
        false,
        [],
        
      )],
        ['type' => 'section', 'sectionOptions' => ['type' => 'popout', 'preset' => ['slug' => 'BreakdanceCustomElements\\Year-Data']]],
        false,
        false,
        [],
        
      ),
    true,
    null
);

