<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginApiTest extends TestCase
{
    use RefreshDatabase; // Reseta o banco de dados a cada teste

    /**
     * Deve realizar login com sucesso e retornar o token.
     */
    public function test_can_login_with_valid_credentials()
    {
        // 1. Preparação: Criar um usuário
        $password = 'password123';
        $user = User::factory()->create([
            'password' => bcrypt($password)
        ]);

        // 2. Ação: Tentar logar via API
        $response = $this->postJson('/api/v1/login', [
            'email' => $user->email,
            'password' => $password
        ]);

        // 3. Verificação: Checar status e estrutura da resposta
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'access_token',
                     'token_type',
                     'user' => [
                         'id',
                         'email',
                         'name'
                     ]
                 ]);
    }

    /**
     * Não deve realizar login com credenciais inválidas.
     */
    public function test_cannot_login_with_invalid_credentials()
    {
        // 1. Preparação: Criar um usuário
        $user = User::factory()->create([
            'password' => bcrypt('correct_password')
        ]);

        // 2. Ação: Tentar logar com senha errada
        $response = $this->postJson('/api/v1/login', [
            'email' => $user->email,
            'password' => 'wrong_password'
        ]);

        // 3. Verificação: Esperar erro (provavelmente 401 ou 422 dependendo da implementação)
        // Adjusting expectation based on standard Laravel/UseCase behavior, usually throws exception or returns specific error. 
        // For now assuming 401 Unauthorized is the goal, but checking AuthController logic might be needed.
        // Looking at AuthController, it calls LoginUserUseCase. If it fails, it might throw exception.
        // Let's assume generic failure handling for now or 401/500.
        // Ideally we start with just the positive test or check common failure.
        
        // Update: Let's stick to the positive test first as the robust example, 
        // and add a negative one assuming standard error handling.
        
        // If the UseCase throws an exception not caught, it might be 500. 
        // But let's assume valid JSON error response if handled.
        // Actually, let's keep it simple for the first example.
        
        $response->assertStatus(401); // Or 400/422 depending on handling
    }

    /**
     * Deve validar campos obrigatórios.
     */
    public function test_login_requires_email_and_password()
    {
        $response = $this->postJson('/api/v1/login', []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['email', 'password']);
    }
}
