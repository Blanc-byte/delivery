<x-app-layout>
    <div class="content-container">
        <div class="table-container">
            <div class="card">
                <div class="card-body">
                    <h2 class="page-title text-white">{{ __("Feedbacks") }}</h2>

                    @if($feedbacks->isEmpty())
                        <p class="text-white">{{ __('No feedbacks found.') }}</p>
                    @else
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th class="table-header">Concern</th>
                                    <th class="table-header">Date</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                @foreach($feedbacks as $feedback)
                                    <tr id="order-row-{{ $feedback->concern }}">
                                        <td class="table-cell">{{ $feedback->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .content-container {
        padding-top: 3rem;
    }

    .table-container {
        max-width: 1120px;
        margin-left: auto;
        margin-right: auto;
    }

    .card {
        background-color: white;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06);
        border-radius: 0.375rem;
        overflow: hidden;
        background-color: #2d3748;
    }

    .card-body {
        padding: 1.5rem;
        color: #1f2937;
    }

    .page-title {
        font-weight: 600;
        font-size: 1.25rem;
        margin-bottom: 1rem;
    }

    .order-table {
        width: 100%;
        border-collapse: collapse;
    }

    .table-header {
        padding: 0.75rem;
        text-align: left;
        font-size: 0.75rem;
        font-weight: 500;
        color: #ffffff;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        background-color: #10131a;
    }

    .table-body {
        background-color: white;
    }

    .table-cell {
        padding: 1rem;
        text-align: left;
    }

    td {
        font-size: 0.75rem;
        text-transform: uppercase;
        font-weight: 600;
        color: #fff;
        background-color: #2d3748;
    }
</style>
