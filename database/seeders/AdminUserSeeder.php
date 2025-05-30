use Illuminate\Database\Seeder;
use App\Models\User; // ou o modelo correspondente

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('Thomas@102030'),
            'role' => 'admin', // ajuste conforme o seu projeto
        ]);
    }
}