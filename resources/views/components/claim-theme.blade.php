<div class="claim-theme">
    <header class="bg-primary text-white text-center py-3">
        <h1>ระบบเคลมประกัน</h1>
    </header>

    <main class="py-4">
        {{ $slot }}
    </main>

    <footer class="text-center py-3 mt-4 border-top">
        <p>&copy; {{ date('Y') }} Insurance Company. All Rights Reserved.</p>
    </footer>
</div>

<style>
    .claim-theme {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .claim-theme header {
        background-color: #007bff;
    }

    .claim-theme main {
        flex-grow: 1;
        padding: 20px;
    }

    .claim-theme footer {
        background-color: #f1f1f1;
    }
</style>
