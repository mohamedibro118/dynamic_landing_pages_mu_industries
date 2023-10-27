<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Nav extends Component
{
  public $items;
  public $active;
  public function __construct()
  {
    $this->items = $this->setpermition(config('nav'));
    $this->active = Route::currentRouteName();
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.nav');
  }

  public function setpermition($terms)
  {
    $user = Auth::guard('admin')->user();
    foreach ($terms as $key => $term) {
      if(!$user->suber_admin && $term['title'] == 'Dev Sitting'){
        unset($terms[$key]);
      }
      if (isset($term['ability']) && !$user->can($term['ability']) ) {
       
        unset($terms[$key]);
      }

      if ($term['subItems'] ?? false) {
        
        foreach ($term['subItems'] as $subKey => $item) {
          if (isset($item['ability']) && !$user->can($item['ability'])) {
            unset($terms[$key]['subItems'][$subKey]);
           
          }
        }
      }
    }
    return $terms;
  }
}
