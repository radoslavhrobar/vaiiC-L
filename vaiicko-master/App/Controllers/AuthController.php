<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Core\Responses\ViewResponse;
use App\Models\User;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return Response
     */

    public function index(): Response
    {
        return $this->html();
    }

    public function registruj() {
        $data = $this->request()->getPost();
        $upozornenia = [];

        if (empty($data['email'])) {
            $upozornenia['email'] = "Email musí byť vyplnený!";
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $upozornenia['email'] = "Email musí byť v správnom formáte!";
        } else if (!empty(User::getAll(whereClause: '`email` LIKE ?', whereParams: [$data['p_meno']]))) {
            $upozornenia['email'] = "Tento email už existuje!";
        }

        if (empty($data['p_meno'])) {
            $upozornenia['p_meno'] = "Používateľské meno musí byť vyplnené!";
        } else if (strlen($data['p_meno']) < 3 || strlen($data['p_meno']) > 30) {
            $upozornenia['p_meno'] = "Používateľské meno musí byť v rozmedzí od 3 do 30 znakov!";
        } else if (is_numeric($data['p_meno'][0])) {
            $upozornenia['p_meno'] = "Prvý znak v používateľskom mene niesme byť číslica!";
        } else if (!ctype_alnum($data['p_meno'])) {
            $upozornenia['p_meno'] = "Používateľské meno môže obsahovať len alfanumerické znaky a musí byť bez medzier!";
        } else if (!empty(User::getAll(whereClause: '`p_meno` LIKE ?', whereParams: [$data['p_meno']]))) {
            $upozornenia['p_meno'] = "Toto používateľské meno už existuje!";
        }

        if (empty($data['heslo'])) {
            $upozornenia['heslo'] = "Heslo musí byť vyplnené!";
        } else if (strlen($data['heslo']) < 8) {
            $upozornenia['heslo'] = "Heslo musí byť minimálne 8 znakov dlhé!";
        }

        if (empty($data['overenieHesla'])) {
            $upozornenia['overenieHesla'] = "Overenie hesla musí byť vyplnené!";
        } else if ($data['overenieHesla'] !== $data['heslo']) {
            $upozornenia['overenieHesla'] = "Heslá sa musia zhodovať!";
        }

        if (!empty($data['meno'])) {
            if (strlen($data['meno']) > 30) {
                $upozornenia['meno'] = "Meno nesmie prekročiť dĺžku 30 znakov!";
            } else if (!preg_match('/^[a-zA-ZáäčďéëíĺľňóöôřšťúüýžÁÄČĎÉËÍĹĽŇÓÖÔŘŠŤÚÜÝŽ]+$/u', $data['meno'])) {
                $upozornenia['meno'] = "Meno môže obsahovať iba písmená!";
            } else if (!ctype_upper($data['meno'][0])) {
                $upozornenia['meno'] = "Meno musí začínať velkým písmenom!";
            }
        }

        if (!empty($data['priezvisko'])) {
            if (strlen($data['priezvisko']) > 30) {
                $upozornenia['priezvisko'] = "Priezvisko nesmie prekročiť dĺžku 30 znakov!";
            } else if (!preg_match('/^[a-zA-ZáäčďéëíĺľňóöôřšťúüýžÁÄČĎÉËÍĹĽŇÓÖÔŘŠŤÚÜÝŽ]+$/u', $data['priezvisko'])) {
                $upozornenia['priezvisko'] = "Priezvisko môže obsahovať iba písmená!";
            } else if (!ctype_upper($data['priezvisko'][0])) {
                $upozornenia['priezvisko'] = "Priezvisko musí začínať velkým písmenom!";
            }
        }

        if (!empty($data['pohlavie'])) {
            if ($data['pohlavie'] != 'muz' && $data['pohlavie'] != 'zena' && $data['pohlavie'] != 'ine') {
                 $upozornenia['pohlavie'] = "Pohlavie môže byť iba muž, žena a iné!";
            }
        }

        if (count($upozornenia) == 0) {
            $user = new User();
            $user->setEmail($data['email']);
            $user->setPmeno($data['p_meno']);
            $user->setHeslo($data['heslo']);
            $user->setPohlavie($data['pohlavie']);
            $user->save();
        }
        return $this->html(['upozornenia' => $upozornenia], 'index');
    }

    /**
     * Login a user
     * @return Response
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect($this->url("home.index"));
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);
    }

    /**
     * Logout a user
     * @return ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->redirect($this->url("home.index"));
    }
}
