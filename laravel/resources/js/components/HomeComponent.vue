<template>
  <div>
    <v-card class="mx-auto" max-width="600" dark color="#00897B" hover>
      <v-card-title class="headline">
        <v-icon large left>mdi-charity</v-icon>
        <span class="title font-weight-light">Enter number</span>
      </v-card-title>
      <div class="p-4">
        <v-text-field
          label="َUnique number count between 0to 150,000"
          :rules="uniqRules"
          hide-details="auto"
          counter="7"
          v-model="count"
        ></v-text-field>
        <v-spacer></v-spacer>
        <v-btn
          :loading="loader"
          :disabled="loader"
          color="#2E7D32"
          class="ma-2 mt-4 white--text"
          block
          @click="send()"
        >
          Send
          <v-icon right dark>mdi-cloud-upload</v-icon>
        </v-btn>
      </div>
    </v-card>

    <v-snackbar v-model="alertShow" :multi-line="true" :color="alertColor" :timeout="alertTime">
      {{ alertText }}
      <template v-slot:action="{ attrs }">
        <v-btn color="red" text v-bind="attrs" @click="alertShow = false">Close</v-btn>
      </template>
    </v-snackbar>

  </div>
</template>

<script>
export default {
  data: function() {
    return {
      count: null,
      loader: false,
      alertShow: false,
      alertText: null,
      alertColor: null,
      alertTime: 4000,
      uniqRules: [
        v => !!v || "Unique is required",
        v => v <= 150000 || "Unique must be less than 150,000 ",
        v => v >= 1 || "Unique must be biger than 1"
      ]
    };
  },
  methods: {
    send: function() {
      this.loader = true;
      axios.get("../../lumen/public?count=" + this.count).then(Response => {
        var data = Response.data;
        if (data.status == true) {
          this.alertColor = "#127681";
          this.alertText = data.msg;
          this.alertShow = true;
        } else {
          this.alertColor = "#fa1616";
          this.alertText = data.msg;
          this.alertShow = true;
        }
        this.loader = false;
      });
    }
  }
};
</script>
