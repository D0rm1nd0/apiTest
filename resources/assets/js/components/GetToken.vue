<template>
    <div>
        <div class="alert alert-danger" v-if="session.error">
            <h3>
                {{session.error}}   
            </h3>
        </div>
        <div class="alert-success row" v-if="session.success">
            <h2>
                {{session.success}}
            </h2>
        </div>
        <div v-if="session.logado == 'true'">
            <div class="row">
                <div class="col">
                    <h3>Nome:</h3>
                </div>
                <div class="col">
                    <h3>{{user.name}}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3>Api Token:</h3>
                </div>
                <div class="col">
                    <h3>{{user.api_token}}</h3>
                </div>
            </div>
        </div>
        <div class="btn-block" v-else>
          <a class="btn btn-success" href="/login"> Login </a>
          <a class="btn btn-primary" href="/register"> Register </a>
        </div>
        <hr/>
        <div class="row">
            <label class="label label-primary"> Token </label>
            <input class="form-control" type="text" id="token">
        </div>
        <br>
        <div class="row">
            <button class="btn btn-success" @click="updateData">Atualizar Banco de dados</button>
        </div>
    </div>
</template>
<script>
export default {
  data() {
    return {
      user: {
        name: "",
        api_token: ""
      },
      session: {
        logado: "false",
        error: "",
        success: ""
      }
    };
  },
  mounted() {
    console.log("GetToken mounted");
  },
  created() {
    this.getUser();
  },
  methods: {
    updateData: function() {
      var token = $("#token").val();
      this.session.success = "";
      this.session.error = "";
      return axios
        .get("/api/update/", {
          params: {
            api_token: token
          }
        })
        .then(response => {
          this.session.success = "Atualizado com sucesso";
          console.log(response);
        })
        .catch(error => {
          this.session.error = "Token inválido";
        });
    },
    getUser: function() {
      return axios["get"]("get-user")
        .then(response => {
          if (response.data.user == null) {
            this.session.logado = "false";
            return;
          }
          this.user = response.data.user;
          this.session.logado = "true";
          console.log(this.user);
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>

