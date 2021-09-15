<div class="col-lg-12">
    <div class="grid">
        <p class="grid-header">{{__('Orders list')}}</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <div class="table-responsive">
                    <div class="pt-2 relative mx-auto text-gray-600 flex flex-row-reverse mr-6 mb-2">
                        <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                            type="search"
                            name="search"
                            placeholder="Rechercher"
                            wire:model="search">
                    </div>
                    <table class="table info-table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">{{__('Customer')}}</th>
                                <th class="text-center">{{__('Order number')}}</th>
                                
                                <th class="text-center">{{__('Purchased on')}}</th>
                                <th class="text-center">{{__('Order price')}}</th>
                                <th class="text-center">{{__('Order status')}}</th>
                                <th class="text-center">{{__('Actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            
                        </tbody>
                        <tfoot>
                            {{$orders->links()}}
                        </tfoot>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
