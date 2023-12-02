<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Person;
use App\Models\Admin;
use App\Models\Mechanic;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }
    
    public function logout(Request $request)
    {
        // Limpa a sessão
        Session::flush();

        // Regenera o token CSRF
        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function login(Request $request)
    {
        // Validação das credenciais
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);
    
        // Busca o usuário com base nas credenciais
        $user = Person::where('email', $credentials['email'])
            ->where('password', $credentials['password'])
            ->first();
    
        if ($user) {
            // Verifica se o usuário é administrador ou funcionário ativo
            if ($this->isUserAdminOrMechanicAtivo($user)) {
                return $this->redirectToDashboard($user->profile);
            }
            // Verifica se o funcionário está inativo
            elseif (!$this->isMechanicAtivo($user)) {
                return redirect('/admin/login')->withErrors(['error' => 'Conta desativada. Verifique seu e-mail e senha com o administrador.']);
            }
        }            
    
        // Se chegou aqui, são credenciais inválidas
        return redirect('/admin/login')->withErrors(['login' => 'Credenciais inválidas. Verifique seu e-mail e senha.']);
    }    

    /**
     * Verifica se o usuário é um administrador.
     *
     * @param  \App\Models\Person $user
     * @return bool
     */
    private function isAdmin($user)
    {
        return Admin::where('person_id_person', $user->id_person)->exists();
    }

    /**
     * Verifica se o funcionário está ativo.
     *
     * @param  \App\Models\Person  $user
     * @return bool
     */
    private function isMechanicAtivo($user)
    {
        $mechanic = Mechanic::where('person_id_person', $user->id_person)->first();

        // Verifica se o funcionário existe e está ativo (status = 1)
        if ($mechanic && $mechanic->status === 1) {
            return true;
        } elseif ($mechanic && $mechanic->status === 0) {
            // Conta desativada
            return false; 
        }

        // Retorna false para indicar que o funcionário não está ativo
        return false;
    }

    /**
     * Verifica se o usuário é um administrador ou funcionário ativo.
     *
     * @param  \App\Models\Person  $user
     * @return bool
     */
    private function isUserAdminOrmechanicAtivo($user)
    {
        return $this->isAdmin($user) || $this->isMechanicAtivo($user);
    }

    /**
     * Redireciona o usuário para o painel apropriado com base no profile.
     *
     * @param  string  $profile
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectToDashboard($profile)
    {
        if ($profile === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($profile === 'mechanic') {
            return redirect('/admin/dashboard');
        }

        // Redirecionamento padrão ou tratamento de erro se necessário
        return redirect('/admin/login')->with('error', 'Perfil não reconhecido.');
    }

    /**
     * Exibe o painel do administrador.
     *
     * @return \Illuminate\View\View
     */
    public function adminDashboard()
    {
        return view('adminDashboard');
    }

    /**
     * Exibe o painel do funcionário.
     *
     * @return \Illuminate\View\View
     */
    public function mechanicDashboard()
    {
        return view('dashboard');
    }
}
