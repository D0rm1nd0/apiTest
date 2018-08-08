<template>
    <div>
       <hr/>
      <table class="table">
        <thead>
          <tr>
            <th>Rank</th>
            <th>Name</th>
            <th>Symbol</th>
            <th>Website slug</th>
            <th>Circulating supply</th>
            <th>Total supply</th>
            <th>Max supply</th>
            <th>Quote </th>
          </tr>
        </thead>
        <tbody>
            <tr v-for="dado in dados" :key="dado.id">
              <td>{{dado.rank}}</td>
              <td>{{dado.name}}</td>
              <td>{{dado.symbol}}</td>
              <td>{{dado.website_slug}}</td>
              <td>{{dado.circulating_supply}}</td>
              <td>{{dado.total_supply}}</td>
              <td>{{dado.max_supply}}</td>
              <th>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCenter">
                  Exibir
                </button>
                <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Cotação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col">market cap</div>
                          <div class="col">{{dado.quote.market_cap}}</div>
                        </div>
                        <div class="row">
                          <div class="col">percent change 1h</div>
                          <div class="col">{{dado.quote.percent_change_1h}}</div>
                        </div>
                        <div class="row">
                          <div class="col">volume 24h</div>
                          <div class="col">{{dado.quote.volume_24h}}</div>
                        </div>
                        <div class="row">
                          <div class="col">percent change 7d</div>
                          <div class="col">{{dado.quote.percent_change_7d}}</div>
                        </div>
                        <div class="row">
                          <div class="col">percent change 7d</div>
                          <div class="col">{{dado.quote.percent_change_7d}}</div>
                        </div>
                        <div class="row">
                          <div class="col">price</div>
                          <div class="col">{{dado.quote.price}}</div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </th>
            </tr>
        </tbody>  
      </table>        
    </div>
</template>
<script>
export default {
  props: {
    coins: { type: Array }
  },
  data() {
    return {
      dados: this.coins
    };
  },
  mounted() {
    console.log("component mounted");
  }
};
</script>
