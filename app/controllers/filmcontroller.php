<?php
class FilmController
{
    public function __construct(private Film $model) {}

    public function index(): void
    {
        $films = $this->model->getAll();
        $flash = $this->pullFlash();
        require __DIR__ . '/../views/film/index.php';
    }

    public function create(): void
    {
        $flash = $this->pullFlash();
        require __DIR__ . '/../views/film/create.php';
    }

    public function store(): void
    {
        $this->requirePost();
        $data  = $this->collectInput($_POST);
        $error = $this->validate($data);

        if ($error !== null) {
            $this->setFlash('error', $error);
            $this->redirect('create');
        }

        try {
            $this->model->insert($data);
            $this->setFlash('success', 'Film berhasil ditambahkan.');
        } catch (PDOException $e) {
            $this->setFlash('error', 'Gagal menambahkan film.');
        }
        $this->redirect('index');
    }

    public function edit(): void
    {
        $id   = (int) ($_GET['id'] ?? 0);
        $film = $this->model->findById($id);

        if (!$film) {
            http_response_code(404);
            exit('Data film tidak ditemukan.');
        }
        $flash = $this->pullFlash();
        require __DIR__ . '/../views/film/edit.php';
    }

    public function update(): void
    {
        $this->requirePost();
        $id    = (int) ($_POST['id'] ?? 0);
        $data  = $this->collectInput($_POST);
        $error = $this->validate($data);

        if ($error !== null) {
            $this->setFlash('error', $error);
            $this->redirect('edit', ['id' => $id]);
        }

        try {
            $this->model->update($id, $data);
            $this->setFlash('success', 'Data film berhasil diperbarui.');
        } catch (PDOException $e) {
            $this->setFlash('error', 'Gagal memperbarui data film.');
        }
        $this->redirect('index');
    }

    public function delete(): void
    {
        $this->requirePost();
        $id = (int) ($_POST['id'] ?? 0);

        try {
            $this->model->delete($id);
            $this->setFlash('success', 'Film berhasil dihapus.');
        } catch (PDOException $e) {
            $this->setFlash('error', 'Gagal menghapus film.');
        }
        $this->redirect('index');
    }

    private function collectInput(array $input): array
    {
        return [
            'judul'       => trim($input['judul'] ?? ''),
            'sutradara'   => trim($input['sutradara'] ?? ''),
            'genre'       => trim($input['genre'] ?? ''),
            'tahun_rilis' => trim($input['tahun_rilis'] ?? ''),
            'rating'      => trim($input['rating'] ?? '')
        ];
    }

    private function validate(array $d): ?string
    {
        foreach ($d as $value) {
            if ($value === '') {
                return 'Semua field wajib diisi.';
            }
        }
        if (!ctype_digit($d['tahun_rilis']) || (int) $d['tahun_rilis'] < 1888 || (int) $d['tahun_rilis'] > 2100) {
            return 'Tahun rilis harus berupa angka antara 1888 dan 2100.';
        }
        if (!is_numeric($d['rating']) || (float) $d['rating'] < 0 || (float) $d['rating'] > 10) {
            return 'Rating harus berupa angka antara 0 dan 10.';
        }
        return null;
    }

    private function requirePost(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit('Metode request tidak diizinkan.');
        }
    }

    private function setFlash(string $type, string $message): void
    {
        $_SESSION['flash'] = ['type' => $type, 'message' => $message];
    }

    private function pullFlash(): ?array
    {
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);
        return $flash;
    }

    private function redirect(string $action, array $params = []): void
    {
        $query = http_build_query(array_merge(['page' => 'film', 'action' => $action], $params));
        header('Location: index.php?' . $query);
        exit;
    }
}
?>