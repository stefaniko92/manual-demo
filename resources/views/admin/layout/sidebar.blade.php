<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Noble<span>UI</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/admin') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Products</li>
            <li class="nav-item {{ active_class(['products']) }}">
                <a href="{{ route('products.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Products </span>
                </a>
            </li>
            <li class="nav-item nav-category">Questionnaires</li>
            <li class="nav-item {{ active_class(['questionnaire']) }}">
                <a href="{{ route('questionnaire.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Questionnaire </span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['questions']) }}">
                <a href="{{ route('questions.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Questions </span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['answers']) }}">
                <a href="{{ route('answers.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Answers </span>
                </a>
            </li>
        </ul>
    </div>
</nav>
