export default {

    state: {
        isHidden: false

    },

    getters: {

        getIsHidden(state){ //take parameter
            return state.isHidden
        }
    },
    method: {
        setIsHidden(){
            this.isHidden = !this.isHidden;
        }

    },
    actions: {
        allCategoryFromDatabase(context){

            axios.get("api/category")

                .then((response)=>{
                    console.log(response.data.categories)
                    context.commit("categories",response.data.categories) //categories will be run from mutation

                })

                .catch(()=>{

                    console.log("Error........")

                })
        }
    },

    mutations: {
        categories(state,data) {
            return state.category = data
        }
    }
}
