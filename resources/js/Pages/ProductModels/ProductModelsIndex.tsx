import PrimaryButtonLink from "@/Components/Buttons/PrimaryButtonLink";
import Card from "@/Components/Card";
import List from "@/Components/Data/List";
import SimpleRow from "@/Components/Data/SimpleRow";
import PageContainer from "@/Components/PageContainer";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import {PageProps} from "@/types";

export interface ProductModelsIndexProps extends PageProps {
    productModels: any[];
    totalCount: number;
}

export default function ProductModelsIndex({
    auth,
    productModels,
    totalCount,
}: ProductModelsIndexProps) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={{ name: "Manage Products" }}
        >
            <PageContainer>
                <div className="mx-auto text-right">
                    <PrimaryButtonLink
                        href={route("products.create")}
                        title={"New Product"}
                    />
                </div>

                <Card heading={`Your Products (${totalCount})`}>
                    <List>
                        {productModels.map((productModel) => (
                            <SimpleRow
                                id={productModel.id}
                                title={productModel.name}
                                description={productModel.description}
                                key={productModel.id}
                                editLink="products.edit"
                            />
                        ))}

                        {productModels.length === 0 && (
                            <>
                                <h3>No products yet!</h3>
                                <PrimaryButtonLink
                                    href={route("products.create")}
                                    title={"New Product"}
                                />
                            </>
                        )}
                    </List>
                </Card>
            </PageContainer>
        </AuthenticatedLayout>
    );
}
