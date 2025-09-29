<?php

namespace Modules\Expenses\Enum;

enum CategoryEnum: string
{
    case Food_And_Drinks = 'Food And Drinks';
    case Transportation = 'Transportation';
    case Office_Supply = 'Office Supply';
    case Utilities = 'Utilities';
    case Rental = 'Rental';
    case Salary = 'Salary';
    case Entertainment = 'Entertainment';
    case Healthcare = 'Healthcare';
    case Miscellaneous = 'Miscellaneous';
}
