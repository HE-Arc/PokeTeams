@extends("layout.app")

@section("content")

<?php
    class BackRouteGenerator
    {
        private ?string $backRoute = null;
        private array $linkValues = [];

        public function generateBackRoute(): ?string
        {
            $this->addVariablesToBackRoute();
            $this->addParametersVariableToBackRoute();

            if (!empty($this->linkValues)) {
                $this->backRoute = route($this->getBackRoute(), $this->getParameters());
            }

            return $this->backRoute;
        }

        private function addVariablesToBackRoute(): void
        {
            foreach ($_GET as $key => $value) {
                if ($key != 'params') {
                    $this->linkValues[] = $value;
                }
            }
        }

        private function addParametersVariableToBackRoute(): void
        {
            if (isset($_GET['params'])) {
                foreach ($_GET['params'] as $key => $value) {
                    $this->linkValues[$key] = $value;
                }
            }
        }

        private function getParameters(): array
        {
            return array_slice($this->linkValues, 1);
        }

        private function getBackRoute(): ?string
        {
            return $this->linkValues[0] ?? null;
        }
    }

    $backRouteGenerator = new BackRouteGenerator();
    $backRoute = $backRouteGenerator->generateBackRoute();
?>

<div class="container mt-5 w-75">
    @if(isset($backRoute))
        <a href="{{ $backRoute }}" class="btn btn-primary mb-3"><i class="bi bi-arrow-return-left"></i>
            Back
        </a>
    @endif

    <h1>{{ $pokemon->name }}</h1>

    <img height="300px" style="aspect-ratio: 1/1; object-fit: contain" src="/images/pokemon_sprites/{{$pokemon->sprite}}" alt="Sprite of {{$pokemon->name}}">


    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="fixed-width">Types</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="fixed-width">
                <div class="type-wrapper">
                    <span class="type-tag" style="background-color: {{ $pokemon->type1->color }};">
                        {{ strtoupper($pokemon->type1->name) }}
                    </span>
                    @if ($pokemon->type2)
                        <span class="type-tag" style="background-color: {{ $pokemon->type2->color }};">
                            {{ strtoupper($pokemon->type2->name) }}
                        </span>
                    @endif
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="fixed-width">Statistics</th>
            <th class="fixed-width">Base</th>
            <th class="fixed-width">Min</th>
            <th class="fixed-width">Max</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="fixed-width">
                HP
            </td>
            <td class="fixed-width">
                {{ $pokemon->base_hp }}
            </td>
            <td class="fixed-width">
                {{ $pokemon->min_hp }}
            </td>
            <td class="fixed-width">
                {{ $pokemon->max_hp }}
            </td>
        </tr>
        <tr>
            <td class="fixed-width">
                Attack
            </td>
            <td class="fixed-width">
                {{ $pokemon->base_attack }}
            </td>
            <td class="fixed-width">
                {{ $pokemon->min_attack }}
            </td>
            <td class="fixed-width">
                {{ $pokemon->max_attack }}
            </td>
        </tr>
        <tr>
            <td class="fixed-width">
                Defense
            </td>
            <td class="fixed-width">
                {{ $pokemon->base_defense }}
            </td>
            <td class="fixed-width">
                {{ $pokemon->min_defense }}
            </td>
            <td class="fixed-width">
                {{ $pokemon->max_defense }}
            </td>
        </tr>
        <tr>
            <td class="fixed-width">
                Special attack
            </td>
            <td class="fixed-width">
                {{ $pokemon->base_special_attack }}
            </td>
            <td class="fixed-width">
                {{ $pokemon->min_special_attack }}
            </td>
            <td class="fixed-width">
                {{ $pokemon->max_special_attack }}
            </td>
        </tr>
        <tr>
            <td class="fixed-width">
                Special defense
            </td>
            <td class="fixed-width">
                {{ $pokemon->base_special_defense }}
            </td>
            <td class="fixed-width">
                {{ $pokemon->min_special_defense }}
            </td>
            <td class="fixed-width">
                {{ $pokemon->max_special_defense }}
            </td>
        </tr>
        <tr>
            <td class="fixed-width">
                Speed
            </td>
            <td class="fixed-width">
                {{ $pokemon->base_speed }}
            </td>
            <td class="fixed-width">
                {{ $pokemon->min_speed }}
            </td>
            <td class="fixed-width">
                {{ $pokemon->max_speed }}
            </td>
        </tr>
        </tbody>
    </table>
</div>
@endsection
