<?php

// function setActive($routeName)
// {
//     return request()->routeIs($routeName) ? 'active' : '';
// }

function setActive($routeName)
{
    return request()->routeIs($routeName) ? 'active' : '';
}

