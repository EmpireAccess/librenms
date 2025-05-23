<?php

/**
 * ResolutionController.php
 *
 * -Description-
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * @link       https://www.librenms.org
 *
 * @copyright  2019 Tony Murray
 * @author     Tony Murray <murraytony@gmail.com>
 */

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SessionController
{
    public function style(Request $request): JsonResponse
    {
        $request->validate([
            'style' => 'required|string|in:dark,light',
        ]);

        $request->session()->put('applied_site_style', $request->style);

        return response()->json(['style' => $request->style]);
    }

    public function resolution(Request $request): string
    {
        $request->validate([
            'width' => 'required|numeric',
            'height' => 'required|numeric',
        ]);

        // laravel session
        session([
            'screen_width' => $request->width,
            'screen_height' => $request->height,
        ]);

        return $request->width . 'x' . $request->height;
    }
}
